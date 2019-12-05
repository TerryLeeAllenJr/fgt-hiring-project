<template>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item" @click="updateSelectedCategory" v-for="category in categories">
                        <a class="nav-link" :class="{ 'active': selectedCategory == category.id}"
                           href="#" :data-categoryId="category.id">{{category.name}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data: () => {
      return  {
        categories: {},
        selectedCategory: {}
      }
    },
    methods: {
      updateSelectedCategory(e) {
        e.preventDefault();

        // Get the selecgted category from the data arrtibute.
        let selectedCategory = e.target.getAttribute('data-categoryId');
        this.selectedCategory = selectedCategory;

        Event.$emit('selected-category-updated',this.selectedCategory);
      }
    },
    created() {

      // Listen for the categories to be updated and update the .
      Event.$on('categories-updated', (categories) => {
        this.categories = categories;
        this.selectedCategory = categories[0].id;
      });
    }
  }
</script>
