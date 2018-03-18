<template>
	<div v-if="question">
			<edit-question :data="question" v-if="editing"></edit-question>

	
			<ShowQuestion :data="question" v-else></ShowQuestion>
	
	</div>
	
	
</template>

<script>
import ShowQuestion from './ShowQuestion.vue'
import EditQuestion from './EditQuestion.vue'

export default {
	name: 'Read',
	components:{
		ShowQuestion,
		EditQuestion
	},
	data(){
		return {
			question:null,
			editing: false
			
		}
	},
	created(){
		this.listen()
		this.getQuestion()
	},
	methods: {
		listen(){
			EventBus.$on('startEditing', () => {
					this.editing = true
			})

			EventBus.$on('cancelEditing', () => {
					this.editing = false
			})
		},

		getQuestion(){
			axios.get(`/api/question/${this.$route.params.slug}`)
			.then(res => this.question = res.data.data)
			.catch(err => console.log(err.data.error))
		}

		
	}

}
</script>

<style>

</style>
