<template>
	<div v-if="question">
			<edit-question :data="question" v-if="editing"></edit-question>

	
			<ShowQuestion :data="question" v-else></ShowQuestion>

		<v-container grid-list-md>
			<replies :question="question" ></replies>

			<new-reply class="mt-4" :questionSlug="question.slug"></new-reply>
		</v-container>
		
	
	</div>
	
	
</template>

<script>
import ShowQuestion from './ShowQuestion.vue'
import EditQuestion from './EditQuestion.vue'
import Replies from '../reply/Replies.vue'
import NewReply from '../reply/NewReply.vue'

export default {
	name: 'Read',
	components:{
		ShowQuestion,
		EditQuestion,
		Replies,
		NewReply
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
