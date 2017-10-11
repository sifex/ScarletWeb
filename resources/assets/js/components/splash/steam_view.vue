<template>
    <div class="steam-view">
        <transition name="fade">
            <div class="loading-wrapper" v-if="loading">
                <img src="https://d37dagtz5y7rwi.cloudfront.net/dist/images/cookbook/preloader-6b4f61fcbb.gif" alt="">
            </div>
        </transition>

        <div class="wrapper grid-container">
            <div class="grid-x grid-padding-x align-center-middle text-center">
                <div class="cell">
                    <img class="logo" src="/images/toRemove/logo.png" width="150" alt="">
                    <headline>
                        <h2>
                            Welcome to <span :style="{ color: '#2d85d6' }">Australian Armed Forces</span>
                        </h2>
                    </headline>
                    <steam-button></steam-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import imagesLoaded from 'imagesloaded'

    import Headline from './subcomponents/headline.vue';
    import SteamButton from './subcomponents/steam_button.vue';

    export default {
        data: function () {
            return {
                message: '',
                loading: true,
            }
        },
        components: {
            Headline,
            SteamButton
        },
        methods: {
            test: function (response) {
                if (response.data.status) {
                    this.$router.push('/invite/' + response.data.inviteCode)
                }
            }
        },
        mounted: function() {
            var _this = this;

//            console.log(imagesLoaded);
            imagesLoaded(document.querySelector('.steam-view'), { background: true }, function() {
                setTimeout(function() {
                    _this.loading = false;
                }, 100)

            })
        }
    }
</script>

<style lang="scss" scoped>
    @import 'node_modules/foundation-sites/scss/foundation';

    .steam-view {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        min-height: 100vh;
        background: #333e53 url('/api/clan/1/image') no-repeat center;
        -webkit-background-size: cover;
        background-size: cover;
        color: $white;

        &:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.7);
        }

        @include breakpoint(retina) {
            background-image: url('/api/clan/1/image');
        }
        .grid-x {
            height: 100vh;
            padding-bottom: 80px;
        }
        .wrapper {
            position: relative;
            z-index: 3;
        }

        .logo {
            margin: 0 auto 20px;
        }

        .initial-splash-enter-active, .initial-splash-leave-active {
            transition: opacity .5s, transform .5s;

            transition-delay: 1.25s;
        }

        .initial-splash-enter, .initial-splash-leave-to {
            opacity: 0;
            transform: translateY(50px);
        }

        .loading-wrapper {
            background-color: #21121a;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 5;

            img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                filter: brightness(-200);
            }
        }

        .fade-enter-active, .fade-leave-active {
            transition: opacity 1.5s
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
            opacity: 0
        }
    }



</style>