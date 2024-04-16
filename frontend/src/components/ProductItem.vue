<template>
  <div class="col">
    <div class="card">
      <img :src="product.image" class="card-img-top" alt="{{ product.title }}">
      <div class="card-body">
        <h5 class="card-text">{{ product.title }}</h5>
        <div class="text-center">
          <h6 class="card-subtitle mb-2 text-muted">{{ product.price }}</h6>
          <button class="btn btn-primary" @click="addToCart">
            Add item
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductItem',
  props: ['product'],
  methods: {
    addToCart() {
      this.$emit('add-to-cart', this.product.id, 1);
    }
  }

};
</script>

<style>
  .card{
    margin-top:10px;
  }
  .card-img-top {
    margin-top:15px;
    width: 100%;
    height: 15vw;
    object-fit: contain;
  }
  .card-text{
    height:50px;
    overflow: hidden;
  }
</style>