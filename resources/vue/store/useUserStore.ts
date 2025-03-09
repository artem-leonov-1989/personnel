import {defineStore} from "pinia";
import {computed, ComputedRef, ref, Ref} from "vue";

interface UserStore {
    name?: string;
}

export const useUserStore = defineStore('user', () => {
    const user: Ref<UserStore> = ref({
        name: undefined,
    });

    const isAuth:ComputedRef<boolean> = computed(() => {
        return (user.value.name !== undefined);
    });

    const getUserName:ComputedRef<string|undefined> = computed(() => {
        return user.value.name;
    })

    return {isAuth, getUserName};
});
