import { Navigate, Outlet } from "react-router-dom";
import { useAuth } from "../../hooks/AuthContext";

export default function PrivateRoute() {
  const { isAuth } = useAuth();
  console.log("PrivateRoute isAuth:", isAuth);
  return isAuth ? <Outlet /> : <Navigate to="/login" replace />;
}
