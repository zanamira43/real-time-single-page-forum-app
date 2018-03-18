<template>
	<v-container fluid>
		<v-card>
			<v-form @submit.prevent="update">
					<v-text-field
						label="Title"
						v-model="form.title"
						type="text"
						required
					></v-text-field>

			<markdown-editor v-model="form.body" ></markdown-editor>
			<v-card-actions>
				<v-btn icon type="submit">
					<v-icon class="teal--text">save</v-icon>
				</v-btn>

				<v-btn icon @click="cancel">
					<v-icon class="black--text">cancel</v-icon>
				</v-btn>
			</v-card-actions>


			</v-form>
		</v-card>
	</v-container>
</template>

<script>
export default {
	name: 'editquestion',
	props: ['data'],
	data(){
		return {
			form: {
				title: null,
				body: null
			}
		}
	},
	created(){
		this.form = this.data
	},
	methods: {
		cancel(){
			EventBus.$emit('cancelEditing')
		},
		update(){
			axios.patch(`/api/question/${this.form.slug}`, this.form)
				.then(res => this.cancel())
				.catch(err => console.log(err.response.data.error))
		}
	}

}
</script>

<style>

</style>
