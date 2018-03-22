<template>
	<div>
		<reply v-for="(reply, index) in content"
		 :key="reply.id" 
		 :data="reply" 
		 :index="index"
		 v-if="content"
		 ></reply>
	</div>
</template>

<script>
import Reply from './Reply.vue'
export default {
	name: 'replies',
	props: ['question'],
	data(){
		return {
			content: this.question.replies

		}
	},
	components: {
		Reply
	},
	created(){
		this.listen()
	},
	methods: {
		listen(){
			EventBus.$on('NewReply', (reply) => {
					this.content.unshift(reply)
					window.scrollTo(0,0)
			})

			EventBus.$on('deleteReply', (index) => {
					axios.delete(`/api/question/${this.question.slug}/reply/${
						this.content[index].id
					}`).then(res => {
						this.content.splice(index, 1)
					})
					
			})
		}
	}

}
</script>

<style>

</style>
