<template>
    <div class="invite-view">
        <transition tag="div">
            <div class="wrapper-invite-code grid-container">
                <div class="grid-x grid-padding-x align-center-middle text-center">
                    <div class="small-12 medium-7 large-5 cell shader">
                        <div class="wrapper">
                            <div class="logo"></div>
                            <div>
                                <headline>
                                    <h2>
                                        <span class="primary">Scarlet</span>
                                    </h2>
                                    <p>Please enter your invite code below.</p>
                                </headline>
                                <invite-input></invite-input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>

</template>

<script>



    import Headline from './subcomponents/headline.vue';
    import InviteInput from './subcomponents/invite_input.vue';

    export default {
        data: function () {
            return {
                message: '',
            }
        },
        components: {
            Headline,
            InviteInput
        },
        methods: {
            test: function (response) {
                console.log(response.data)
                if (response.data.status) {
                    this.$router.push('/invite/' + response.data.inviteCode)
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import 'node_modules/foundation-sites/scss/foundation';

    .invite-view {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        min-height: 100vh;
        background: url('/images/splash/scarlet_bg.jpg') no-repeat center;
        -webkit-background-size: cover;
        background-size: cover;
        -webkit-background-size: cover;
        background-size: cover;
        color: $white;

        &:after {
            content: "";
            z-index:0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.3);
            border-radius:5px;
        }

    }

    .grid-x {
        height: 100vh;
        padding-bottom: 80px;

        .shader {
            position: relative;
            padding-top: 40px;
            padding-bottom: 40px;
            border-radius:5px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.1);
            overflow: hidden;

            &:before {
                content: "";
                z-index:1;
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background: url('/images/splash/scarlet_bg.jpg') no-repeat center;
                -webkit-background-size: 100vw 100vh;
                background-size: 100vw 100vh;
                -webkit-filter: blur(3px);
                -moz-filter: blur(3px);
                -o-filter: blur(3px);
                -ms-filter: blur(3px);
                filter: blur(3px);
                border-radius:5px;
            }
        }

        .wrapper {
            position: relative;
            z-index: 2;
        }
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