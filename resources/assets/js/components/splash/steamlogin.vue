<template>
    <button class="button" @click="goToSteamAPI()">
        <i class="fa fa-steam-square" aria-hidden="true"></i>
        Login to Scarlet with Steam&reg;
    </button>
</template>

<script>
    export default {
        methods: {
            goToSteamAPI: function() {
                var _this = this;

                window.location = '/steam/verify/' + this.$route.params.inviteCode

            }
        }
    }
</script>

<style lang="scss" scoped>

.button {
    background-color: #323232;
    color: #FFF;
    border-radius: 5px;
    margin-top: 10px;
}

</style>