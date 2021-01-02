<template>
    <div>
        <tollbar></tollbar>
        <router-view></router-view>
        <appfooter></appfooter>
    </div>
</template>

<script>
import tollbar from "./Toolbar.vue";
import appfooter from "./AppFooter.vue";
export default {
    components: {
        tollbar,
        appfooter
    }
};
</script>

<style></style>
