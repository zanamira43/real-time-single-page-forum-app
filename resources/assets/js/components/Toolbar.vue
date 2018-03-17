<template>
  <v-toolbar>
    <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link v-for="item in items" :key="item.title" :to="item.to" v-show="item.show">
				<v-btn flat>{{ item.title}}</v-btn>
			</router-link>
      
		
      
    </div>
  </v-toolbar>
</template>

<script>
export default {
	name: 'toolbar',
	data(){
		return {
			items: [
				{title: 'Forum', to:'/forum', show: true},
				{title: 'Ask Question', to:'/ask', show: User.loginedIn()},
				{title: 'Category', to:'/category', show: User.loginedIn()},
				{title: 'Login', to:'/login', show: !User.loginedIn()},
				{title: 'Logout', to:'/logout', show: User.loginedIn()}
			]
		}
	},
	created(){
		EventBus.$on('logout', () => {
			User.logout()
		})
	}

}
</script>

<style>

</style>
