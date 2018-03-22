<template>
		<v-container>
		<v-form @submit.prevent="submit" >
			<v-text-field
				label="Category Name"
				v-model="form.name"
				type="text"
				required
			></v-text-field>
		

			<v-btn type="submit" class="green white--text" v-if="!editSlug">Create</v-btn>
			<div v-else>
				<v-btn type="submit" class="pink white--text" >Update</v-btn>
			</div>
			
		</v-form>

		<v-card>
		<v-toolbar dense class="indigo">
			<v-toolbar-title class="white--text">Categories</v-toolbar-title>
		</v-toolbar>

		<v-list>
			<v-list-tile v-for="(category, index) in categories" :key="category.id">
				<v-list-tile-action>
					<v-btn icon @click="edit(index)">
						<v-icon class="orange--text">edit</v-icon>
					</v-btn>
				</v-list-tile-action>

				<v-list-tile-content>
					<v-list-tile-title>{{category.name}}</v-list-tile-title>
				</v-list-tile-content>

					<v-list-tile-action>
					<v-btn icon @click="destroy(category.slug, index)">
						<v-icon class="red--text">delete</v-icon>
					</v-btn>
				</v-list-tile-action>
			</v-list-tile>
		</v-list>
	</v-card>
	</v-container>
</template>

<script>
export default {
	name: 'Create-Category',
	data(){
		return {
			form: {
				name: null
			},
			categories: {},
			editSlug:null
		}
	},
	methods: {
		// check if update or creat methods available
		submit(){
			this.editSlug ? this.update() : this.create() 
		},

		// update category
		update(){
			axios.patch(`/api/category/${this.editSlug}`, this.form)
					.then(res => {
					this.categories.unshift(res.data)
					this.form.name = null
				})
				.catch(err => console.log(err.response.data.error))
		},
		// create new category
		create(){
			axios.post('/api/category', this.form)
				.then(res => {
					this.categories.unshift(res.data)
					this.form.name = null
				})
				.catch(err => console.log(err.response.data.error))
		},

		// delete category
		destroy(slug, index){
			axios.delete(`/api/category/${slug}`)
				.then(res => this.categories.splice(index, 1))
				.catch(err => console.log(err.response.data.error))
		},

		// edit category
		edit(index){
			this.form.name = this.categories[index].name
			this.editSlug = this.categories[index].slug
			this.categories.splice(index, 1)

		}

	},
	// check login
	mounted(){
			if(!User.admin()){
				this.$router.push('/forum')
		}
	},
	// get all categories
	created(){
		axios.get('/api/category').then(res => this.categories = res.data.data)
			.catch(err => console.log(res.response.data.error))
	}

}
</script>

<style>

</style>
