<template>
    <div class="welcome_text">

        <div class="intro">
            <slot name="heading"></slot>
        </div>


        <div class="instructions">
            <slot name="paragraph"></slot>
        </div>

    </div>
</template>

<script>

    export default {

        data: function() {
            return {


            }
        }
    }

</script>

<style lang="scss">
    .intro {
        font-size: 42px;
        span {
            color: #df3238;
        }
    }

    .instructions {
        color: #ff9999;
    }
</style>