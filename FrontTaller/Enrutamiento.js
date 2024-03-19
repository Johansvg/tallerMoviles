import { View, Text } from 'react-native'
import React from 'react'
import { NavigationContainer } from '@react-navigation/native'
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs'
import { AntDesign } from '@expo/vector-icons'
import Imagen from './Imagen'
import Registro from './Registro'

const Tab = createBottomTabNavigator();

function MyTabs() {
    return (
        <Tab.Navigator>
            <Tab.Screen name="Registro" component={Registro} options={{
                tabBarIcon: ({ color, size }) => (
                    <AntDesign name="adduser" size={size} color={color} />
                    ),
                }} />
                <Tab.Screen name="Imagen" component={Imagen} options={{
                    tabBarIcon: ({ color, size }) => (
                        <AntDesign name="login" size={size} color={color} />
                    ),
                }} />
        </Tab.Navigator>
    )
}

export default function Enrutamiento() {
  return (
    <NavigationContainer>
        <MyTabs />
    </NavigationContainer>
  )
}