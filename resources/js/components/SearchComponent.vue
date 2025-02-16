
  <script>
  export default {
    props: ["products"],
    data() {
      return {
        search: "",
      };
    },
    computed: {
      filteredProducts() {
        return this.products.filter((product) =>
          product.name.toLowerCase().includes(this.search.toLowerCase())
        );
      }
    }
  };
  </script>
  
  <template>
    <div>
      <input v-model="search" placeholder="Search products..." class="form-control mb-3">
  
      <h1 class="d-flex justify-content-center m-3">All Products</h1>
  
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Product ID</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(product, index) in filteredProducts" :key="product.id">
            <td>{{ index + 1 }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.product_id }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.stock }}</td>
            <td>
              <img :src="'/products/' + product.image" class="rounded-circle" height="50" width="50" />
            </td>
            <td>
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  