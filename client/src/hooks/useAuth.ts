import { useState, useEffect } from "react";
import { register, login, logout, setupAxiosInterceptors } from "../api/auth";
import { UserLogin, UserRegister } from "../types/auth";

type User = {
  id: number;
  name: string;
  email: string;
} | null;

export const useAuth = () => {
  const [user, setUser] = useState<User>(null);
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  useEffect(() => {
    setupAxiosInterceptors();
    const storedUser = localStorage.getItem("user");
    if (storedUser) {
      setUser(JSON.parse(storedUser));
      setIsAuthenticated(true);
    }
  }, []);

  const handleLogin = async (userlogin: UserLogin ) => {
    const { token, user } = await login(userlogin);
    localStorage.setItem("token", token);
    localStorage.setItem("user", JSON.stringify(user));
    setUser(user);
    setIsAuthenticated(true);
  };

  const handleRegister = async (userRegister: UserRegister) => {
    const { token, user } = await register(userRegister);
    localStorage.setItem("token", token);
    localStorage.setItem("user", JSON.stringify(user));
    setUser(user);
    setIsAuthenticated(true);
  };

  const handleLogout = async () => {
    await logout();
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    setUser(null);
    setIsAuthenticated(false);
  };

  return {
    user,
    isAuth: isAuthenticated,
    login: handleLogin,
    register: handleRegister,
    logout: handleLogout,
  };
};
