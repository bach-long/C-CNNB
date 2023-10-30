import axios from "../../config/axios";

export const getCompaniesService = (page, query) => {
  return axios.get(`/api/company/search?page=${page}&${query}`);
};

export const detailCompany = (id) => {
  return axios.get(`/api/company/info/${id}`);
};
