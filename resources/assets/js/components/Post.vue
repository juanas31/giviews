<template>
  <div class="panel panel-default">
      <div class="panel-body">
        <textarea rows="3" class="form-control" v-model="content" placeholder="What do you think?"></textarea>
        <br>
        <button class="btn btn-success pull-right" :disabled="not_working" @click="create_post()">Create a post</button>
    </div>
</template>

<script>
  export default {
    mounted() {
    },
    data() {
      return {
        content: '',
        not_working: true
      }
    },
    methods: {
      create_post() {
      this.$http.post('/create_post', { content: this.content })
        .then((resp) => {
          this.content = '',
          noty({
            type: 'success',
            layout: 'bottomLeft',
            text: 'Your post has been published !'
          })
          console.log(resp)
        })
      }
    },
    watch: {
      content() {
        if(this.content.length > 0)
          this.not_working = false
        else
          this.not_working = true
      }
    }
  }
</script>
