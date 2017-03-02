<template>
<div>
  <div class="panel panel-default" v-for="post in posts">
    <div class="panel-heading">
      {{ post.user.name }}
      <span class="pull-right">
        {{ post.created_at }}
      </span>
    </div>
    <div class="panel-body">
      <img :src="post.user.avatar" alt="user-avatar" width="40px" height="40px" class="img img-circle">
      <p>
      {{ post.content }}
      </p>
      </div>
      <div class="panel-footer">
      <like :id="post.id"></like>
    </div>
  </div>
</template>

<script>
  import Like from './Like.vue'

  export default {
    mounted() {
      this.get_feed()
    },
    components: {
      Like
    },
    methods: {
      get_feed() {
        this.$http.get('/feed')
            .then( (response) => {
              response.body.forEach( (post) => {
                this.$store.commit('add_post', post)
              })
            })
      }
    },

    computed: {
      posts() {
        return this.$store.getters.all_posts
      }
    }
  }
</script>
