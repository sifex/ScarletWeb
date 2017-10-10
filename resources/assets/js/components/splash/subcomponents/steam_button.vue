<template>
    <button class="button" @click="goToSteamAPI()">
        <i class="fa fa-steam-square" aria-hidden="true"></i>Login to Scarlet with Steam&reg;
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
        background-color: #474747;
        color: #FFF;
        border-radius: 5px;
        margin-top: 10px;

        i {
            margin-right: 15px;
        }
    }

</style>