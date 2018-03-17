<template>
		<v-container>
		<v-form @submit.prevent="signup" >
			<v-text-field
				label="Name"
				v-model="form.name"
				type="text"
				required
			></v-text-field>
			<span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

			<v-text-field
				label="Email"
				v-model="form.email"
				type="email"
				required
			></v-text-field>
			<span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

			<v-text-field
				label="Password"
				v-model="form.password"
				type="password"
				required
			></v-text-field>
			<span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
			
			<v-text-field
				label="Confirm Password"
				v-model="form.password_confirmation"
				type="password"
				required
			></v-text-field>

			<v-btn type="submit" class="green white--text">Sign up</v-btn>
			<v-btn to="/login" class="blue white--text">Login</v-btn>
		</v-form>
	</v-container>
</template>

<script>
export default {
	name: 'signup',
	data(){
		return {
			form: {
				name: null,
				email: null,
				password: null,
				password_confirmation: null
			},
			errors: {}
		}
	},
	created() {
		if(User.loginedIn()){
			this.$router.push({name: 'forum'})
		}
	},
	methods: {
		signup(){
			axios.post('/api/auth/signup', this.form)
				.then(res => User.responseAfterLogin(res))
				.catch(error => this.errors = error.response.data.errors)
		}
	}
}
</script>

<style>

</style>
