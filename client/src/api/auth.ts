import axios from "axios";
import { UserLogin, UserRegister } from "../types/auth";

const API_URL = import.meta.env.VITE_BACKEND_API_BASE_URL;

export const login = async (userInfo: UserLogin) => {
  try {
    const response = await axios.post(`${API_URL}/login`, userInfo);
    return response.data;
  } catch (error) {
    if (axios.isAxiosError(error)) {
      throw new Error(error.response?.data?.message || "Login failed");
    }
    throw new Error("Login failed");
  }
};

export const register = async (userInfo: UserRegister) => {
  try {
    const response = await axios.post(`${API_URL}/register`, userInfo);
    return response.data;
  } catch (error) {
    if (axios.isAxiosError(error)) {
      throw new Error(error.response?.data?.message || "Registration failed");
    }
    throw new Error("Registration failed");
  }
};

export const logout = async () => {
  try {
    await axios.post(
      `${API_URL}/logout`,
      {},
      {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      }
    );
  } catch (error) {
    console.log("Something happend wrong: ", error);
  }
};

export const setupAxiosInterceptors = () => {
  axios.interceptors.request.use((config) => {
    const token = localStorage.getItem("token");
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  });

  axios.interceptors.response.use(
    (response) => response,
    (error) => {
      if (error.response?.status === 401) {
        localStorage.removeItem("token");
        window.location.href = "/login";
      }
      return Promise.reject(error);
    }
  );
};
