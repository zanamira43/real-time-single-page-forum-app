<template>
		<v-card>
			<v-container fluid>
				<v-card-title>
					<div>
						<div class="headline mb-0">{{data.title}}</div>
						<span class="grey--text">{{data.user}} Said {{data.created_at}}</span>
					</div>

					<v-spacer></v-spacer>
					<v-btn class="teal" dark>{{data.reply_count}} Replies</v-btn>
				</v-card-title>
				<v-card-text v-html="body"></v-card-text>	

				<v-card-actions v-if="own">
					<v-btn icon @click="edit">
							<v-icon class="orange--text" >edit</v-icon>
					</v-btn>

						<v-btn icon @click="destroy">
							<v-icon class="red--text">delete</v-icon>
					</v-btn>
				</v-card-actions>
			</v-container>
		</v-card>
</template>

<script>

export default {
	name: 'show-question',
	props: ['data'],

	data(){
		return {
			own: User.own(this.data.user_id)
		}
	},
	
	computed:{
		 body(){
			 return md.parse(this.data.body)
		 }
	},
	methods: {
		destroy(){
			axios.delete(`/api/question/${this.data.slug}`)
				.then(res => this.$router.push('/forum'))
				.catch(error => error.response.data.error)
		},

		edit(){
			EventBus.$emit('startEditing')
		}
	}

}
</script>

<style>

</style>
