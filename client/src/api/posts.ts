import axios from "axios";
import type { PostCreate, PostUpdate, Post } from "../types/post";

const API_URL = import.meta.env.VITE_BACKEND_API_BASE_URL;

export const getPosts = async (): Promise<Post[]> => {
    const response = await axios.get(`${API_URL}/posts`);
    return response.data;
}

export const getPost = async (id: number): Promise<Post> => {
    const response = await axios.get(`${API_URL}/posts/${id}`);
    return response.data;
}

export const createPost = async (postInfo: PostCreate): Promise<Post[]> => {
    const response = await axios.post(`${API_URL}/posts`, postInfo)
    return response.data;
}

export const update = async (id: number, postInfo: PostUpdate): Promise<Post[]> => {
    const response = await axios.put(`${API_URL}/posts/${id}`, postInfo)
    return response.data;
}

export const deletePost = async (id: number): Promise<void> => {
    const response = await axios.delete(`${API_URL}/posts/${id}`);
    return response.data;
}
