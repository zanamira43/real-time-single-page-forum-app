<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap >
			<v-flex xs8>
				<question 
				v-for="question in questions" 
				:key="question.path"
				:data="question"
				></question>
			</v-flex>

			<v-flex xs4>
				<sidebar></sidebar>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
import Question from './Question'
import Sidebar from './Sidebar'

export default {
	name: 'forum',
	components: {
		Question,
		Sidebar
	},
	data(){
		return {
			questions: {},
		}
	},
	created(){
		axios.get('/api/question')
			.then(res => this.questions = res.data.data)
			.catch(err => console.log(err.data.errors))
	}
}
</script>

<style>

</style>
