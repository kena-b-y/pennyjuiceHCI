<template>
  <h1>DashoardView</h1>
</template>

<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: 'login'})
      }
    }
  } 
</script>
