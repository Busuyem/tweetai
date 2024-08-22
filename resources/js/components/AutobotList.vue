<template>
  <div>
    <h3>Autobot List</h3>
    <ul>
      <li v-for="autobot in autobots" :key="autobot.id">
        {{ autobot.name }} - {{ autobot.email }}
      </li>
    </ul>
    <button @click="loadMore">Load More</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      autobots: [],
      nextPage: 1,
      loading: false,
    };
  },
  created() {
    this.fetchAutobots();
  },
  methods: {
    fetchAutobots() {
      if (this.loading) return;
      this.loading = true;
      axios.get(`/api/autobots?page=${this.nextPage}`)
        .then(response => {
          this.autobots.push(...response.data.data);
          this.nextPage++;
        })
        .finally(() => {
          this.loading = false;
        });
    },
    loadMore() {
      this.fetchAutobots();
    }
  }
}
</script>
