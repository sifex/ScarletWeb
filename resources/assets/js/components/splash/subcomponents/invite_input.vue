<template>
    <transition name="fade">
        <form class="input" @submit.prevent="submitForm">
            <input v-model="inviteCode" type="text" placeholder="Invite Code"/>
            <transition name="fade">
                <span class="error" v-html="error" v-if="error.length > 0"></span>
            </transition>
        </form>
    </transition>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                inviteCode: "",
                error: ""
            }
        },
        methods: {
            submitForm: function() {
                var _this = this;
                this.inviteCode = this.inviteCode.trim();
                // Checking Invite Code
                // If True ->
                // this.$router.push('/invite/' + this.inviteCode)

                // If False ->
                if(this.inviteCode.length !== 8) {
                    _this.error = "Invalid Invite Code";
                    return;
                }

                axios.get('/api/invite/' + this.inviteCode)
                    .then(function (response) {
                        console.log(response.data.status);
                        if(response.data.status) {
                            _this.error = "";
                            _this.$router.push('/invite/' + _this.inviteCode)
                        } else {
                            _this.error = "Invalid Invite Code";
                        }
                    })
                    .catch(function (error) {
                        _this.error = "The Invite Server is down at the moment. Please try again later.";
                        console.log(error);
                    });

                // https://vignette1.wikia.nocookie.net/rvb/images/6/61/Lopez_head_Spanish.png/revision/latest?cb=20130219234400


            }
        }

    }
</script>

<style lang="scss" scoped>
    .input {
        max-width: 300px;
        margin: 20px auto;

        input {
            border: none;
            border-radius: 6px;
            font-size: 20px;
            text-align: center;

            &::placeholder {
                color: #e5efed;
                vertical-align: middle;
            }
        }
    }
    .error {
        color: red;
    }
</style>