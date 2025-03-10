<template>
    <el-row>
        <el-col>
            <el-form
                label-position="right"
                label-width="auto"
                :model="loginForm"
                class="login-form"
            >
                <el-form-item label="Логін">
                    <el-input type="text" v-model="loginForm.login" autocomplete="off"/>
                </el-form-item>
                <el-form-item label="Пароль">
                    <el-input type="password" v-model="loginForm.password" autocomplete="off"/>
                </el-form-item>
                <el-row>
                    <el-col :span="6" :offset="9">
                        <el-form-item>
                            <el-button
                                type="primary"
                                :loading="authProcess"
                                @click="login"
                                :disabled = !checkCredentials
                            >
                                Авторизація
                            </el-button>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>
        </el-col>
    </el-row>
</template>

<script setup lang="ts">

import {computed, ComputedRef, Ref, ref} from "vue";
import {useUserStore} from "@/store/useUserStore";
import {sanctumRequest, apiRequest} from "@/config/axios";
import {ElMessage} from "element-plus";

const loginForm = ref({
    login: '',
    password: ''
})

const user = useUserStore();
const authProcess: Ref<boolean> = ref(false);
const login = () => {
    sanctumRequest.get('/sanctum/csrf-cookie').then(() => {
        apiRequest.post('login', {
            login: loginForm.value.login,
            password: loginForm.value.password
        }).then((response) => {
            console.log(response);
            // this.$router.push('/');
        }).catch((error) => {
            if (error.response) {
                if (error.response.status === 401 || error.response.status === 422) {
                    errorMessage('Не авторизовано!');
                } else {
                    errorMessage('Помилка у процесі авторизації');
                }
            }
        })
    }).catch((error) => {
        console.error(error)
    })
}

const errorMessage = (message: string) => {
    ElMessage({
        message: message,
        type: "error",
        plain: true
    });
}

const checkCredentials:ComputedRef<boolean> = computed((): boolean => {
    return true;
    // return (loginForm.value.login.length >= 3 && loginForm.value.password.length >= 10);
})
</script>
