<template>
    <table class="highlight responsive-table">
        <thead>
            <tr>
                <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)"
                class="grey-text" 
                :class="[sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting',  column.name === 'imagen' ? 'hide-on-med-and-down' : '']"
                :style="'cursor:pointer;'">
                <span class="left">{{column.label}}</span> 
                
                <i class="material-icons left hide-on-small-only" v-if="sortKey === column.name && sortOrders[column.name] > 0 ">arrow_upward</i>
                <i class="material-icons left hide-on-small-only" v-else>arrow_downward</i>

                <i class="material-icons left hide-on-large-only show-on-small" v-if="sortKey === column.name && sortOrders[column.name] > 0 ">arrow_back</i>
                <i class="material-icons left hide-on-large-only show-on-small" v-else>arrow_forward</i>
                
                </th>
                <th class="grey-text">Accion</th>
            </tr>
        </thead>
    <slot></slot>
</table>
</template>

<script>
export default {
    props: ['columns', 'sortKey', 'sortOrders']
}
</script>