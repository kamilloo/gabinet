<template>
    <div class="col-12 pb-2">
        <slot></slot>
        <div v-html="extraItems" ></div>
        <button type="button" class="btn btn-info js__next-price-item" @click="addNext">Kolejna popozycja</button>
    </div>
</template>

<script>
    export default {
        name: "PricingItems",
        props: {
            dataTemplate: String
        },
        data (){
            return {
                nextItem: 1,
                extraItems: ''
            }
        },
        mounted() {
        },
        methods: {
            addNext() {
                var templateHtml = this.dataTemplate.replace(/\[{%.*%}\]/gi,'[' + this.nextItem + ']');
                this.nextItem = this.nextItem + 1;
                this.extraItems = this.extraItems + templateHtml;
                console.log(templateHtml)
            }
        }
    }

</script>
<style scoped>

</style>
