<template>
	<div>
		<v-form @submit.prevent="submit">
			<markdown-editor v-model="body" ></markdown-editor>

		 	<v-btn class="green" dark type="submit">Create</v-btn>
		</v-form>
		 
	</div>
</template>

<script>
export default {
	name: 'new-reply',
	props: ['questionSlug'],
	data(){
		return {
		
				body: null
		}
	},
	methods: {
		submit(){
			axios.post(`/api/question/${this.questionSlug}/reply`, {body: this.body})
				.then(res => {
					this.body = ''
						EventBus.$emit('NewReply', res.data)
					 })
				.catch(err => console.log(err.response.data.error))
		}
	}

}
</script>

<style>

</style>
