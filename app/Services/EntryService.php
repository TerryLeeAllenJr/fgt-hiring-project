<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Entry;
use App\File;
use App\Contracts\EntryContract;

/**
 * Class EntryService
 * @package App\Services
 */
class EntryService implements EntryContract {

    /**
     * Create a new entry.
     * @param array $data
     * @return Model
     */
    public function createEntry(array $data) : Model
    {

        // Eloquent does a good job leveraging the $fillable parameter to gate data written to the database.
        $entry = new Entry($data);
        //$entry->user_id = auth()->user()->id;
        $entry->user_id = 3;

        // Stubbing the image data here instead of coding the upload.
        $files = $this->stubImageData($entry);
        $entry->image_id = $files['image']->id;
        $entry->thumbnail_id = $files['thumb']->id;

        $entry->save();

        return $entry;

    }

    /**
     * Delete an existing entry.
     * @param int $id
     */
    public function deleteEntry(int $id)
    {
        return $this->getEntry($id)->delete();
    }

    /**
     * Get a specific entry.
     * @param int $id
     * @param array $options
     * @return Model
     */
    public function getEntry(int $id, array $options = []) : Model
    {
        return Entry::with(['category','image','thumbnail','user'])->findOrFail($id)->getModel();
    }

    /**
     * Get a list of entries.
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function getEntries(array $options = []) : LengthAwarePaginator
    {
        // Return a paginated response for use with the front end.
        $limit = isset($options['limit']) ? $options['limit'] : 30;

        return Entry::with(['category','image','thumbnail'])
            ->getEntriesByCategory($options)
            ->orderBy('created_at', 'DESC')
            ->paginate($limit);
    }

    /**
     * Update existing entries.
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function updateEntry(int $id, array $data = []) : Model
    {
        // Find the entry and look for it.
        $entry = $this->getEntry($id);
        $entry->update($data);

        return $entry;
    }

    /**
     * This is a (admittadly ugly) stub used in place of an actual upload and should be ignored.
     * @param Entry $entry
     * @return array
     */
    private function stubImageData(Entry $entry) : array
    {

        // Create the image.
        File::where('filename','=',$entry->slug . '.png')->delete();
        $image = new File();
        $image->url = 'https://placehold.it/400x400?text=' . $entry->slug;
        $image->filename = $entry->slug . '.png';
        $image->mimetype = 'image/png';
        $image->height = 400;
        $image->width = 400;
        $image->focus_x = 0;
        $image->focus_y = 0;
        //$image->user_id = auth()->user()->id;
        $image->user_id = 3;
        $image->save();

        // Create the thumb.

        File::where('filename','=',$entry->slug . '_thumb.png')->delete();

        $thumb = new File();
        $thumb->url = 'https://placehold.it/100x100?text=' . $entry->slug;
        $thumb->filename = $entry->slug . '_thumb.png';
        $thumb->mimetype = 'image/png';
        $thumb->height = 100;
        $thumb->width = 100;
        $thumb->focus_x = 0;
        $thumb->focus_y = 0;
        //$thumb->user_id = auth()->user()->id;
        $thumb->user_id = 3;
        $thumb->save();

        return [
            'image' => $image,
            'thumb' => $thumb
        ];
    }
}
