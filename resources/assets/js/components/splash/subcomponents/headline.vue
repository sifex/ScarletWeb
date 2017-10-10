<template>
    <div class="welcome_text">
        <slot></slot>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['primaryColor'],
        data: function() {
            return {


            }
        },
        mounted: function() {
            var _this = this;
            var routeInviteCode = this.$route.params.inviteCode;

            var redirectHome = function() {
                _this.$router.push('/')
            };

            axios.get('/api/invite/' + routeInviteCode).then(function(response) {
                if(!response.data.status) {
                    redirectHome()
                }
            }).catch(function(error) {
                redirectHome()
            })

        }
    }

</script>

<style lang="scss">
    h1, h2, h3, h4, h5, h6 {
        font-size: 42px;

        .primary {
            color: #df3238;
        }
        span {

        }
    }

    p {
        color: #d5d8da;
    }
</style>