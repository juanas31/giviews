<template>
  <div class="row">
    <div class="col-lg-12">
      <input type="text" class="input-lg form-control" placeholder="Search for other user" v-model="query" @keyup.enter="search()">
      <br>
      </div>
      <div>
      <ul v-if="results.length">
      <li v-for="user in results">
        <div class="col-md-3"><a :href="user.slug"><img :src="user.avatar" alt="user image" width="50px" height="50px" class="img-circle"></a></div>
        <div class="col-md-7"><h3><a :href="user.slug">{{ user.name }}</a></h3></a></div>
        <div class="col-md-2"><friend></friend></div>
      </li>
      </ul>
    </div>
  </div>
</template>

<script>
  var algoliasearch = require('algoliasearch')

  var client = algoliasearch('JM3DN0R904', '7c3e7be93537f93b63d8f9648b8fb839')

  var index = client.initIndex('users')

  export default {
  mounted() {

    },
    data() {
      return {
        query: '',
        results: []
      }
    },
    methods: {
      search() {
        index.search(this.query, (err, content) => {
          this.results = content.hits
        })
      }
    }
  }

</script>
