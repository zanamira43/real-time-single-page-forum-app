<template>
	<v-container>
		<v-form @submit.prevent="create" >
			<v-text-field
				label="Title"
				v-model="form.title"
				type="text"
				required
			></v-text-field>
			
			<v-select
          :items="categories"
					item-text="name"
					item-value="id"
          v-model="form.category_id"
          label="Category"
          autocomplete
      ></v-select>

			
			<markdown-editor v-model="form.body" ></markdown-editor>

			<v-btn type="submit" class="green white--text">Create</v-btn>
		</v-form>
	</v-container>
</template>

<script>
export default {
 name: 'create-question',
	data(){
		return {
			form: {
				title: null,
				category_id: null,
				body: null
			},
			categories: {},
			errors: {}
		}
	},
	created(){

		if(!User.loginedIn()){
			this.$router.push({name: 'login'})
		}
		// get all category 
		axios.get('/api/category').then(res => this.categories = res.data.data)
			.catch(err => err.response.data.errors)
	},
	methods: {
		create(){
			axios.post('/api/question', this.form)
				.then(res => this.$router.push(res.data.path))
				.catch(error => this.errors = error.response.data.error)
		}
	}
}
</script>

<style>

</style>
