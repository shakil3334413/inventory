<template>

</template>

<script>
export default {

    created()
    {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
         this.$router.push({name:'login'})
        Toast.fire({
            icon: 'success',
            title: 'Log Out Successfully'
        })
    }
}
</script>

<style>

</style>

