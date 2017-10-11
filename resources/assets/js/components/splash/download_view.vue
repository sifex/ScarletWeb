<template>
    <div class="steam-view">
        <transition name="fade">
            <div class="loading-wrapper" v-if="loading"></div>
        </transition>

        <div class="wrapper-invite-code grid-container">
            <div class="grid-x grid-padding-x align-center-middle text-center">
                <div class="cell">
                    <div class="logo"></div>
                    <headline>
                        <h2>
                            Welcome to <span :style="{ color: '#2d85d6' }">Australian Armed Forces</span>
                        </h2>
                        <p>Login using your Steam</p>
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
                }, 200)

            })
        }
    }
</script>

<style lang="scss">
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

        @include breakpoint(retina) {
            background-image: url('/images/toRemove/bg.jpg');
        }
    }

    .grid-x {
        height: 100vh;
        padding-bottom: 80px;
    }

    .logo {
        width: 199px;
        height: 231px;
        background: url('/images/toRemove/logo.png') no-repeat center;
        background-size: 199px 231px;
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
        background-color: #333e53;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

</style>