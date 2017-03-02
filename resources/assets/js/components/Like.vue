<template>
  <div>
    <p v-for="like in post.likes" class="pull-right" style="display:inline-block;">
    <img :src="like.user.avatar" width="20px" height="20px" class="img img-circle">
    </p>
    <button class="btn btn-info btn-xs" v-if="!auth_user_likes_posts" @click="like()">
    Like
    </button>
    <button class="btn btn-danger btn-xs" v-else @click="unlike()">
    Unlike
    </button>
  </div>
</template>

<script>
  export default {
    mounted() {
    },
    props: ['id'],
    computed: {
      likers() {
        var likers = []

        this.post.likes.forEach( (like) => {
          likers.push(like.user.id)
        })

        return likers
      },
      auth_user_likes_posts() {
        var check_index = this.likers.indexOf(
          this.$store.state.auth_user.id
        )

        if(check_index === -1)
        return false
        else
        return true
      },
      post() {
        return this.$store.state.posts.find( (post) => {
          return post.id === this.id
        })
      }
    },
    methods: {
      like() {
        this.$http.get('/like/' + this.id)
            .then( (resp) => {
              this.$store.commit('update_post_likes', {
                id: this.id,
                like: resp.body
              })
              noty({
                type: 'success',
                layout: 'bottomLeft',
                text: 'Your successfuly like post !'
              })
            })
      },
      unlike() {
        this.$http.get('/unlike/' + this.id)
            .then( (response) => {
            this.$store.commit('unlike_post', {
              post_id: this.id,
              like_id: response.body
            })

            noty({
              type: 'success',
              layout: 'bottomLeft',
              text: 'You successfuly unlike the post.'
            })

          })
      }
    }
  }
</script>
