<template>
    <div class="col-12 pb-2">
        <div v-for="i in extraItems" v-html="i" ></div>
        <button type="button" class="btn btn-info js__next-price-item" @click="addNext">Kolejna popozycja</button>
    </div>
</template>

<script>
    export default {
        name: "PricingItems",
        props: {
            dataTemplate: String,
            entryItems: Array
        },
        data (){
            return {
                nextItem: 0,
                extraItems: []
            }
        },
        mounted() {
            this.extraItems = this.initExtraItems()
        },
        methods: {
            addNext() {
                var regex =  /{%\s(item){1}\s%}/gi;
                var templateHtml = this.dataTemplate
                    .replace(regex, this.nextItem)
                    .replace(/{%\s(title){1}\s%}/gi, '')
                    .replace(/{%\s(price){1}\s%}/gi, '')
                    .replace(/{%\s(description){1}\s%}/gi, '')
                    .replace(/{%\s(link){1}\s%}/gi, '');
                this.nextItem = this.nextItem + 1;
                this.extraItems.push(templateHtml);
            },
            initExtraItems() {
                if (!Array.isArray(this.entryItems))
                {
                    return [];
                }
                let items = [];

                var regex =  /{%\s(item){1}\s%}/gi;
                var templateHtml;
                for(let i in this.entryItems)
                {
                    if (this.entryItems[i].title)
                    {
                        templateHtml = this.dataTemplate
                            .replace(regex, this.nextItem)
                            .replace(/{%\s(title){1}\s%}/gi, this.entryItems[i].title ? this.entryItems[i].title : '')
                            .replace(/{%\s(price){1}\s%}/gi, this.entryItems[i].price ? this.entryItems[i].price : '')
                            .replace(/{%\s(description){1}\s%}/gi, this.entryItems[i].description ? this.entryItems[i].description : '')
                            .replace(/{%\s(link){1}\s%}/gi, this.entryItems[i].link ? this.entryItems[i].link : '');
                        this.nextItem = this.nextItem + 1;

                        items.push(templateHtml)
                    }
                }
                return items;
            }
        },

    }

</script>
<style scoped>

</style>
