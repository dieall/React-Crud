import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom'
import { Container, CssBaseline, ThemeProvider, createTheme } from '@mui/material'
import Login from './components/auth/Login'
import authService from './services/auth.service'

const theme = createTheme({
  palette: {
    mode: 'light',
    primary: {
      main: '#1976d2',
    },
  },
})

function App() {
  const isAuthenticated = authService.isAuthenticated()

  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <Router>
        <Container maxWidth="lg">
          <Routes>
            <Route 
              path="/" 
              element={
                isAuthenticated ? (
                  <Navigate to="/dashboard" />
                ) : (
                  <Navigate to="/login" />
                )
              } 
            />
            <Route path="/login" element={<Login />} />
            <Route 
              path="/dashboard" 
              element={
                isAuthenticated ? (
                  <div>Dashboard - Coming Soon</div>
                ) : (
                  <Navigate to="/login" />
                )
              } 
            />
          </Routes>
        </Container>
      </Router>
    </ThemeProvider>
  )
}

export default App 