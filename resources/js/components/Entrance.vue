<template>
    <div class="appear" v-infocus="'showElement'">
        <slot></slot>
    </div>
</template>

<script>
export default {
    methods: {},
    directives: {
        infocus: {
            isLiteral: true,
            inserted: (el, binding, vnode) => {
                let f = () => {
                    let rect = el.getBoundingClientRect()
                    let inView = (
                        rect.width > 0 &&
                        rect.height > 0 &&
                        rect.top >= 0 &&
                        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
                    )
                    if (inView) {
                        el.classList.add(binding.value)
                        window.removeEventListener('scroll', f)
                    }
                }
                window.addEventListener('scroll', f)
                f()
            }
        }
    }
}
</script>
