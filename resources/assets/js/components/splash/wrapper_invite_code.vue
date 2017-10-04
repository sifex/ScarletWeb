<template>

    <div class="wrapper-invite-code grid-container">
        <div class="grid-x grid-padding-x align-center-middle text-center">

            <div class="cell">

                <transition name="initial-splash" appear>
                    <div class="wrapper">
                        <div class="logo"></div>

                        <transition name="fade"  mode="out-in">
                            <div class="wrapper" v-if="this.$route.path === '/'">
                                <welcome-text>
                                    <div slot="heading"><span>Scarlet</span></div>
                                    <div slot="paragraph">Please enter your invite code below.</div>
                                </welcome-text>


                                <invite-input v-if="" @nextStep="test"></invite-input>
                            </div>
                        </transition>

                        <transition name="fade">
                            <div class="wrapper" v-if="this.$route.path !== '/'">
                                <welcome-text>
                                    <div slot="heading">Welcome to <span>Scarlet</span></div>
                                    <div slot="paragraph">Please login with steam.</div>
                                </welcome-text>

                                <steam-login></steam-login>
                            </div>
                        </transition>



                    </div>
                </transition>
            </div>

        </div>
    </div>

</template>

<script>

    import WelcomeText from './welcome_text.vue';
    import InviteInput from './invite_input.vue';
    import SteamLogin from './steamlogin.vue';

    export default {
        data: function() {
            return {
                message: '',
            }
        },
        components: {
            WelcomeText,
            InviteInput,
            SteamLogin
        },
        methods: {
            test: function(response) {
                console.log(response.data)
                if(response.data.status) {
                    this.$router.push('/invite/' + response.data.inviteCode)
                }

            }

        }
    }
</script>

<style lang="scss">
    @import "node_modules/foundation-sites/scss/foundation";

    body {
        min-height: 100vh;
        background-image: url('/images/splash/scarlet_bg.jpg');
        -webkit-background-size:cover;
        background-size:cover;
        background-position: center;
        background-repeat:no-repeat;

        color: $white;
    }

    .grid-x {
        height: 100vh;
        padding-bottom: 80px;
    }

    .logo {
        width: 94px;
        height: 94px;
        background: url('/images/splash/logo_2x.png') no-repeat center;
        background-size: 94px 94px;
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


</style>