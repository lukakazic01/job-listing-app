import './bootstrap'
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: false })
        let page = await pages[`./Pages/${name}.vue`]()
        if (page.default.layout === undefined) page.default.layout = Layout
        else page.default.layout ??= Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('Link', Link)
            .use(plugin)
            .mount(el)
    }
})
