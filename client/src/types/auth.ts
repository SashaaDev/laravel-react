export interface UserLogin {
  email: string;
  password: string;
}

export interface UserRegister {
  name: string;
  email: string;
  password: string;
}

export interface RegisterResponse {
  token: string;
  user: {
    name: string;
    email: string;
    password: string;
  };
}

export interface UserRegister {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
}