import {defineStore} from "pinia";
import {ref, computed, Ref, ComputedRef} from "vue";

interface UserStore {
    name?: string;
}

export const useUserStore = defineStore('user', () => {
    const userDate: Ref<UserStore> = ref({
        name: undefined,
    })

    const isAuth: ComputedRef<boolean> = computed(() => userDate.value.name !== undefined);

    function setUserName (name: string|undefined) {
        userDate.value.name = name;
    }

    function resetUser () {
        setUserName(undefined);
    }

    return {isAuth, resetUser, setUserName, userDate};
});
