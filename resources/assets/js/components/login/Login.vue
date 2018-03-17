<template>
	<v-container>
		<v-form @submit.prevent="login" >
			<v-text-field
				label="Email"
				v-model="form.email"
				type="email"
				required
			></v-text-field>
			
			<v-text-field
				label="Password"
				v-model="form.password"
				type="password"
				required
			></v-text-field>

			<v-btn type="submit" class="green white--text">Login</v-btn>
			<v-btn to="/signup" class="blue white--text">Sing up</v-btn>
		</v-form>
	</v-container>
 
</template>

<script>
export default {
	name: 'login',
	data(){
		return {
			form: {
				email: null,
				password: null
			}
		}
	},
	created() {
		if(User.loginedIn()){
			this.$router.push({name: 'forum'})
		}
	},
	methods: {
		login(){
			User.login(this.form)
		}
	}
}
</script>

<style>

</style>
