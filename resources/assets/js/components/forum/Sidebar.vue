<template>
	<v-card>
		<v-toolbar dense class="cyan">
			<v-toolbar-title class="white--text">Categories</v-toolbar-title>
		</v-toolbar>

		<v-list>
			<v-list-tile v-for="category in categories" :key="category.id">
				<v-list-tile-content>
					<v-list-tile-title>{{category.name}}</v-list-tile-title>
				</v-list-tile-content>
			</v-list-tile>
		</v-list>
	</v-card>
</template>

<script>
export default {
	name: 'category-list',
	data(){
		return {
			categories: {}
		}
	},
	created(){
		axios.get('/api/category').then(res => this.categories = res.data.data)
			.catch(err => console.log(res.response.data.error))
	}

}
</script>

<style>

</style>
