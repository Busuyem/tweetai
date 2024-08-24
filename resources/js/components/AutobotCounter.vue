// resources/js/components/AutobotCounter.vue

<template>
  <div>
    <h1>Total Autobots: {{ count }}</h1>
  </div>
</template>

<script>
import Echo from 'laravel-echo';

export default {
  data() {
    return {
      count: 0,
    };
  },
  mounted() {
    Echo.channel('autobots')
      .listen('AutobotCreated', (e) => {
        this.count = e.count;
      });

    // Fetch initial count when the component is mounted
    axios.get('/api/autobots/count').then(response => {
      this.count = response.data.count;
    });
  },
};
</script>

<style scoped>
h1 {
    font-size: 2rem;
    font-weight: bold;
    margin: 20px 0;
}
</style>
