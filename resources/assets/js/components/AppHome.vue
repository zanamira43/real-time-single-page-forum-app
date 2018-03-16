<template>
	<div>
		<toolbar></toolbar>

		 <v-container>
			 <h1>hello</h1>
		</v-container>

		<app-footer></app-footer>
	</div>
	 
</template>

<script>
import Toolbar from './Toolbar'
import AppFooter from './AppFooter'

export default {
	name: 'app-home',
	components: {Toolbar, AppFooter}

}
</script>

<style>

</style>
