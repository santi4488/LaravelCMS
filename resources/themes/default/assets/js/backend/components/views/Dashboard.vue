<template>
  <div class="row">
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item" v-for="post in posts">
          <h4>
            <a href="#">{{post.title}}</a>
            <a :href="post.route" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
          </h4>
          <span v-html="post.excerpt"></span>
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item" v-for="user in users">
          <h4>{{user.name}}</h4>
          {{moment(user.last_login_at).fromNow()}}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import moment from 'moment'
  
  export default {
    components: {
      markdown: Markdown,
    },
    props: {
      posts: {
        type: [Object, Array],
        required: false,
        default: []
      },
      users: {
        type: [Object, Array],
        required: false,
        default: []
      }
    },
    created () {
      console.log(this.users[0].last_login_at, moment(this.users[0].last_login_at).fromNow())
    },
    data: function () {
      return {

      }
    },
    methods: {
      moment: moment
    }
  }
</script>
