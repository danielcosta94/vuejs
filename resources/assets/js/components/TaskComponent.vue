<template>
    <div class="card">
        <div class="card-header">
            <slot name="header"></slot>
            <span class="float-right">
                <button class="btn" :class="btn_color" @click.prevent="toggleBody">{{ this.btn_symbol }}</button>
            </span>
        </div>

        <div class="card-body" v-show="visible">
            <slot name="body"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                visible: false,
                btn_color: 'btn-info',
                btn_symbol: '+'
            }
        },

        methods: {
            toggleBody() {
                if (this.visible) {
                    this.btn_symbol = '+';
                    this.btn_color = 'btn-info';
                } else {
                    this.btn_symbol = '-';
                    this.btn_color = 'btn-warning';
                }
                this.visible = !this.visible;
            }
        }
    }
</script>
